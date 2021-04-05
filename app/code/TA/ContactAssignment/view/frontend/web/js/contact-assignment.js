/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

define([
    'jquery',
    'uiComponent',
    'mage/validation',
    'ko',
    'TA_ContactAssignment/js/action/save-contact',
    ], function ($, Component, validation, ko, saveAction) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'TA_ContactAssignment/contact'
            },

            initialize: function () {
                this._super();
            },
            save: function (saveForm) {
                var saveData = {},
                    formDataArray = $(saveForm).serializeArray();

                formDataArray.forEach(function (entry) {
                    saveData[entry.name] = entry.value;
                });

                if($(saveForm).validation() && $(saveForm).validation('isValid')
                ) {
                    saveAction(saveData).always(function() {});
                }
            },
        });
    }
);
