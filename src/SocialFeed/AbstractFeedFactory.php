<?php
namespace App\SocialFeed;

abstract class AbstractFeedFactory
{

    /**
     * Application container
     * 
     * @var Container
     */
    protected $app;

    /**
     * The registered custom service creators.
     *
     * @var array
     */
    protected $customCreators = [];

    /**
     * The array of created "services".
     *
     * @var array
     */
    protected $services = [];
    
    public function __construct($container)
    {
        $this->app = $container;
    }

    public function make($service = null)
    {
        $service = $service ?: $this->getDefaultProvider();

        $config = $this->app['config']['social-feed.services.' . $service];
        if (!$config) {
            throw new \Exception("Missing social feed configuration $service");
        }

        // Pass additional config into sevice specific config
        $config['enable_cache'] = $this->app['config']['social-feed.enable_cache'];
        $config['id'] = $service;

        // If the given service has not been created before, we will create the instances
        // here and cache it so we can return it next time very quickly. If there is
        // already a service created by this name, we'll just return that instance.
        if (! isset($this->services[$service])) {
            $this->services[$service] = $this->createProvider($service, $config);
        }

        return $this->services[$service];
    }

    /**
     * Create new service providing feed
     *
     * @param  string $service Service identifier
     * @param  array  $config  Configurations
     *
     * @return void
     */
    public function createProvider($service, $config = [])
    {
        $method = 'create'.ucfirst($service).'Service';

        // We'll check to see if a creator method exists for the given service. If not we
        // will check for a custom service creator, which allows developers to create
        // services using their own customized service creator Closure to create it.
        if (isset($this->customCreators[$service])) {
            return $this->callCustomCreator($service, $config);
        } elseif (method_exists($this, $method)) {
            return $this->$method($config);
        }

        throw new \InvalidArgumentException("Service [$service] not supported.");
    }

    /**
     * Call a custom service creator.
     *
     * @param  string  $service
     * @param  array   $config
     * @return mixed
     */
    protected function callCustomCreator($service, $config = [])
    {
        return $this->customCreators[$service]($this->app, $config);
    }

    /**
     * Register a custom service creator Closure.
     *
     * @param  string    $service
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($service, Closure $callback)
    {
        $this->customCreators[$service] = $callback;

        return $this;
    }

    /**
     * Get default service
     *
     * @return string
     */
    abstract public function getDefaultProvider();

    /**
     * Dynamically call the default service instance.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->make(), $method], $parameters);
    }
}
