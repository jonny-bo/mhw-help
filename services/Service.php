<?php
namespace mhw\services;

use yii\base\InvalidCallException;
use yii\base\InvalidConfigException;

class Service implements \ArrayAccess
{
    private $_services = array();
    private $_keys = array();
    private $_raws = array();
    private $_frozen = array();

    /**
     * Instantiates the service.
     *
     * Objects and parameters can be passed as argument to the constructor.
     *
     * @param array $values The parameters or objects
     */
    public function __construct(array $values = array())
    {
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * Sets a parameter or an object.
     *
     * Objects must be defined as Closures.
     *
     * Allowing any PHP callable leads to difficult to debug problems
     * as function names (strings) are callable (creating a function with
     * the same name as an existing parameter would break your container).
     *
     * @param string $name    The unique identifier for the parameter or object
     * @param mixed  $value The value of the parameter or a closure to define an object
     *
     * @throws InvalidCallException Prevent override of a service
     */
    public function offsetSet($name, $value)
    {
        if (isset($this->_frozen[$name])) {
            throw new InvalidCallException(sprintf('Cannot override service "%s".', $name));
        }

        $this->_services[$name] = $value;
        $this->_keys[$name] = true;
    }

    /**
     * Gets a parameter or an object.
     *
     * If not set parameters and objects that get a Service Object and set it
     * 
     * @param string $name The unique identifier for the parameter or object
     *
     * @return mixed The value of the parameter or an object
     *
     * @throws InvalidCallException If the identifier is not defined
     */
    public function offsetGet($name)
    {
        if (!isset($this->_keys[$name])) {
            $className = $this->parseService($name);
            $this->offsetSet($name, new $className($this));
        }

        if (is_callable($this->_services[$name])) {
            $raw = $this->_services[$name];
            $val = $this->_services[$name] = $raw($this);
            $this->_raws[$name] = $raw;

            $this->frozen[$name] = true;

            return $val;
        }

        return $this->_services[$name];
    }

    /**
     * Checks if a parameter or an object is set.
     *
     * @param string $name The unique identifier for the parameter or object
     *
     * @return bool
     */
    public function offsetExists($name)
    {
        return isset($this->_keys[$id]);
    }

    /**
     * Unsets a parameter or an object.
     *
     * @param string $name The unique identifier for the parameter or object
     */
    public function offsetUnset($name)
    {
        if (isset($this->_keys[$name])) {
            unset($this->_services[$name], $this->_frozen[$name], $this->_raws[$name], $this->_keys[$name]);
        }
    }

    /**
     * Returns all defined value names.
     *
     * @return array An array of value names
     */
    public function keys()
    {
        return array_keys($this->_services);
    }

    /**
     * serivce name to class通过服务的名字得到具体的类名
     * @param string $name 服务名称
     * @example $name = 'user'; 可以得到mhw\services\UserService or mhw\services\User\UserService;
     * @example $name = 'user.profile'; 可以得到mhw\services\User\ProfileService;
     * @example $name = 'custom.user'; 可以得到mhw\services\Custom\UserService;
     * @return string $className
     */
    protected function parseService($name) :String
    {
        if (empty($name)) {
            throw new InvalidCallException('service name can bet not empty.');
        }
        $arr = explode('.', $name);

        $prefix = 'mhw\\services\\';
        if (count($arr) === 1 && isset($arr[0])) {
            $className = $prefix.ucfirst($arr[0]).'Service';
            if (!class_exists($className)) {
                $className = $prefix.ucfirst($arr[0]).'\\'.ucfirst($arr[0]).'Service';
            }
        } else {
            foreach ($arr as &$argv) {
                $argv = ucfirst($argv);
            }
            $className = $prefix.implode('\\', $arr).'Service';
        }

        if (!class_exists($className)) {
            throw new InvalidCallException("service #{$className} is not exit!");
        }

        return $className;
    }

    /**
     * Registers a service provider.
     *
     * @param ServiceProviderInterface $provider A ServiceProviderInterface instance
     * @param array                    $values   An array of values that customizes the provider
     *
     * @return static
     */
    public function register(ServiceProviderInterface $provider, array $values = array())
    {
        $provider->register($this);

        foreach ($values as $key => $value) {
            $this[$key] = $value;
        }

        return $this;
    }
}
