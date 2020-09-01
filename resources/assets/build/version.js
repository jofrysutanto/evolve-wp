const fs = require('fs')

/**
 * Generate short hash
 */
const generateHash = () => {
  var data = (new Date).toString()
  var crypto = require('crypto')
  return crypto
    .createHash('md5')
    .update(data)
    .digest('hex')
    .substring(0, 8)
}

// Update versioning file with new hash
fs.writeFileSync('dist/version.json', '{ "version": "'+ generateHash() + '" }')
