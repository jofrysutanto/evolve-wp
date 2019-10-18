<?php
namespace App\SocialFeed\Feeds;

use Illuminate\Support\Fluent;

abstract class AbstractFeed
{   
    /**
     * ID of current feed
     *
     * @var string
     */
    protected $id;

    /**
     * Stored feed data
     *
     * @var mixed
     */
    protected $data = false;

    /**
     * Current active configuration
     *
     * @var Fluent
     */
    protected $config;

    /**
     * Cache setting
     *
     * @var boolean
     */
    protected $isCacheEnabled;

    public function __construct(array $config = [])
    {
        $this->config = new Fluent($config);
        $this->id = array_get($config, 'id');
        $this->isCacheEnabled = array_get($config, 'enable_cache', true);
    }

    /**
     * Retrieve feed from service
     *
     * @return void
     */
    public function get()
    {
        if ($this->isCacheEnabled 
            && $data = $this->getCachedValue()) {
            return $data;
        }

        $result = $this->fetch();
        $result = $this->cache($result);

        return $result;
    }

    /**
     * Check if cache is enabled and cached data exists
     *
     * @return boolean
     */ 
    public function hasCache()
    {
        if ($this->isCacheEnabled 
            && $data = $this->getCachedValue()) {
            return true;
        }
        
        return false;
    }

    /**
     * Fetch feed from current service
     *
     * @return array
     */
    abstract public function fetch();

    /**
     * Store data into cache
     *
     * @param  array  $data
     *
     * @return array
     */
    protected function cache($data)
    {
        $data = [ 
            'timestamp' => time(), 
            'data'      => $data
        ];

        file_put_contents($this->getCacheLocation(), json_encode($data));
        return $data;
    }

    /**
     * Attempt to locate and retrieve cache value.
     * Returns FALSE when cache is invalid or not exists
     *
     * @return array|false
     */
    protected function getCachedValue()
    {
        if (!file_exists($this->getCacheLocation())) {
            return false;
        }
        $this->data = json_decode(file_get_contents($this->getCacheLocation()), true);
        $cacheTimestamp = array_get($this->data, 'timestamp');
        $lifetime       = $this->getCacheLifetime();

        if (!$cacheTimestamp || $cacheTimestamp < time() - $lifetime) {
            return false;
        }
        return $this->data;
    }

    /**
     * Retrieve cache location
     *
     * @return string
     */
    public function getCacheLocation()
    {
        $upload_dir = wp_upload_dir();
        $filePath   = sprintf("%s/%s.data", $upload_dir['basedir'], $this->id);
        return $filePath;
    }

    /**
     * Get lifetime of cache, can be configured per service based on config value.
     *
     * @return numeric
     */
    public function getCacheLifetime()
    {
        $lifetime = 15 * 60;
        if ($this->config->lifetime) {
            $lifetime = $this->config->lifetime;
        }

        return $lifetime;
    }

    
}
