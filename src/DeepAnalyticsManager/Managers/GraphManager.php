<?php


    namespace DeepAnalyticsManager\Managers;


    use DeepAnalyticsManager\DeepAnalyticsManager;

    /**
     * Class GraphManager
     * @package DeepAnalyticsManager\Managers
     */
    class GraphManager
    {
        /**
         * @var DeepAnalyticsManager
         */
        private DeepAnalyticsManager $deepAnalyticsManager;

        /**
         * GraphManager constructor.
         * @param DeepAnalyticsManager $deepAnalyticsManager
         */
        public function __construct(DeepAnalyticsManager $deepAnalyticsManager)
        {
            $this->deepAnalyticsManager = $deepAnalyticsManager;
        }
    }