# Mage2 Module Affinity Catalogue

    ``affinity/module-catalogue``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities


## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Affinity`
 - Enable the module by running `php bin/magento module:enable Affinity_Catalogue`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require affinity/module-catalogue`
 - enable the module by running `php bin/magento module:enable Affinity_Catalogue`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - Model
	- Catalogue

 - Model
	- Cataloguecatagory

 - Controller
	- frontend > affinity_catalogue/index/index

 - ViewModel
	- Affinity\Catalogue\ViewModel\Catalogue\Cataloguelist


## Attributes



