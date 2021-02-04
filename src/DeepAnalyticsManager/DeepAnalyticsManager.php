<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */


    namespace DeepAnalyticsManager;

    use acm\acm;
    use DeepAnalyticsManager\Managers\GraphManager;
    use Exception;
    use mysqli;

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
         * @var null
         */
        private $database;
        
        /**
         * @var GraphManager
         */
        private GraphManager $GraphManager;

        /**
         * CoffeeHouse constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->acm = new acm(__DIR__, 'Deep Analytics Manager');
            $this->DatabaseConfiguration = $this->acm->getConfiguration('Database');

            $this->database = null;
            $this->GraphManager = new GraphManager($this);
        }

        /**
         * @return mysqli|null
         */
        public function getDatabase(): ?mysqli
        {
            if($this->database == null)
            {
                $this->connectDatabase();
            }

            return $this->database;
        }


        /**
         * Closes the current database connection
         */
        public function disconnectDatabase()
        {
            $this->database->close();
            $this->database = null;
        }

        /**
         * Creates a new database connection
         */
        public function connectDatabase()
        {
            if($this->database !== null)
            {
                $this->disconnectDatabase();
            }

            $this->database = new mysqli(
                $this->DatabaseConfiguration['Host'],
                $this->DatabaseConfiguration['Username'],
                $this->DatabaseConfiguration['Password'],
                $this->DatabaseConfiguration['Name'],
                $this->DatabaseConfiguration['Port']
            );
        }

        /**
         * @return GraphManager
         */
        public function getGraphManager(): GraphManager
        {
            return $this->GraphManager;
        }
    }