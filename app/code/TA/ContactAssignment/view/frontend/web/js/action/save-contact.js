/**
 * @author Bhumik R Panchal
 * @copyright Copyright (c) 2021 TA Digital (https://www.tadigital.com)
 * @package TA_ContactAssignment
 */

define([
    'jquery',
    'ko',
    'mage/storage',
    'mage/translate',
    'Magento_Customer/js/customer-data'
    ], function ($, ko, storage, $t, customerData) {
        'use strict';
        return function (contactData) {
            return storage.post(
                'contactassignment/index/save',
                JSON.stringify(contactData),
                false
            ).done(
                function (response) {
                    if (response) {
                        customerData.set('messages', {
                            messages: [{
                                type: response.status,
                                text: response.message
                            }]
                        });
                    }
                }
            ).fail(
                function (response) {
                    customerData.set('messages', {
                        messages: [{
                            type: 'error',
                            text: 'something went wrong.'
                        }]
                    });
                }
            );
        };
    }
);
