<?php
namespace App\PostTypes;

use EvolveEngine\Post\AbstractPostType;

class SamplePostType extends AbstractPostType
{

    /**
     * Create new post type, by extending from AbstractPostType
     * and register them as part of config/post-types
     */
    
    /**
     * @var string  The unique key of the custom post type
     */
    public $id = 'true_cpt';

    /**
     * @var string  Singular form
     */
    protected $singleName = 'CPT';

    /**
     * @var string  Plural form
     */
    protected $pluralName = 'CPTs';

    /**
     * @var string  URL friendly name of the post type
     */
    protected $slug = 'cpt';

    /**
     * @var string  Name of the template used to render single post type.
     *              The file must be located within page-templates/*.php
     */
    protected $singleTemplateName = 'single-cpt';

    /**
     * @var string  Name of the template used to render post type archive.
     *              The file must be located within page-templates/*.php
     */
    protected $archiveTemplateName = 'archive-cpt';

    /**
     * @var string  Icon used in backend. Usually uses dashicons set, e.g. `dashicons-format-status`
     *
     * @see https://developer.wordpress.org/resource/dashicons/
     */
    protected $menuIcon = null;

    /**
     * @var string  Icon image used in admin backend. This overrides $menuIcon
     */
    protected $menuImage = 'trueKeylockWPIcons';

    /**
     * @var array  List of post type supported Wordpress feature.
     */
    protected $supports = ['title'];

    /**
     * Add ACF Tax options, will be accessible using `cpt_{post_type}`
     * e.g. get_field('banner_image', 'cpt_true_post_type')
     * 
     * @var boolean 
     */
    public $hasAcfArchive = true;

    /**
     * @var array  List of taxonomy
     */
    protected $tax = [
        'true_cpt_tax' => [
            'slug'   => 'cpts',
            'single' => 'Category',
            'plural' => 'Categories',
        ]  
    ];

}
