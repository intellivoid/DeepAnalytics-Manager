<?php


    namespace DeepAnalyticsManager;

    use acm\acm;
    use Exception;

    require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AutoConfig.php');

    /**
     * Class DeepAnalyticsManager
     * @package DeepAnalyticsManager
     */
    class DeepAnalyticsManager
    {
        /**
         * @var acm
         */
        private acm $acm;
        /**
         * @var mixed
         */
        private $DatabaseConfiguration;

        /**
         * CoffeeHouse constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->acm = new acm(__DIR__, 'Deep Analytics Manager');
            $this->DatabaseConfiguration = $this->acm->getConfiguration('Database');
        }
    }