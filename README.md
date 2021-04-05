# m2-custom-contact-module
This module creates a custom form on storefront. Magento Admin can see all contact information in Grid.

# Installation 

1. Extract TA_ContactAssignment.zip
2. Copy "TA" folder and paste it into app/code directory of your magento 2 setup
3. Run following commands to install module:
	   php bin/magento setup:upgrade
	   
# How to use the module:

1. To Add contact record from storefront visit http://{{Your-magento-URL}}/contactassignment/index/contact/
2. To get the list of all contacts on storefront visit http://{{Your-magento-URL}}/contactassignment/index/contactlist/
3. In Magento Admin, Visting TA Digital -> Contact Assignment to see list of all contacts


# Notes

1. No Test Cases are created for this module.
2. Module is created using vscode IDE with sonarlint plugin to take advantage of development best practices.
3. Module is created and tested in Magento Version 2.4.2
