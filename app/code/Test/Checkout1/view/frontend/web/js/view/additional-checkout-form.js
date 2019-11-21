define([
    'uiComponent',
    'ko',
    'jquery',
    'Magento_Checkout/js/model/quote',

], function (Component, ko, $, quote) {
    'use strict';
    return Component.extend({


        initialize: function () {
            this.additional_field = ko.observable();
            this._super();
            return this;
        },

        onSubmit: function() {
            quote.shippingAddress().extensionAttributes = {};
            quote.shippingAddress().extensionAttributes.additional_field = this.additional_field;

            $.ajax({
                url: '/magento2/rest/V1/test-checkout/post',
                type: "POST",
                data: ko.toJSON({param: quote.shippingAddress()}),
                contentType: "application/json"
            });

            return true;
        }
    });
});