define([
    'Magento_Ui/js/form/form',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore',
    'ko'
], function (Component, stepNavigator, $t, _, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Prisha2_Checkout/contact',
            visible: ko.observable(true),
            contactName: ko.observable(''),
            contactEmail: ko.observable(''),
            sortOrder: 1 // Ensure step order in checkout process
        },

        /**
         * Initialize the component and register the step
         */
        initialize: function () {
            this._super();
            stepNavigator.registerStep(
                'contact',
                'contact',
                $t('Contact'),
                this.visible,
                _.bind(this.navigate, this),
                this.sortOrder
            );
            return this;
        },

        /**
         * Observable initialization
         */
        initObservable: function () {
            this._super().observe(['visible']);
            this.visible(true);
            return this;
        },

        /**
         * Handle navigation to this step
         */
        navigate: function () {
            this.visible(true);
        },

        /**
         * Set contact information and navigate to the next step
         */
        setContactInformation: function () {
            if (this.validateContactInformation()) {
                console.log('Contact Name:', this.contactName());
                console.log('Contact Email:', this.contactEmail());
                stepNavigator.next(); // Move to the next step
            } else {
                alert($t('Please fill out all required fields.'));
            }
        },

        /**
         * Validate contact information
         */
        validateContactInformation: function () {
            return (
                this.contactName() &&
                this.contactEmail() &&
                this.contactEmail().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)
            );
        }
    });
});
