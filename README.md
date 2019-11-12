# Yrgo Examensarbete Backend
#### Wordpress Rest API and Redirect 301 Theme

> Master thesis at Yrgo - [Web Developer Program](https://yrgo.se/utbildningar/media-och-kommunikation/webbutvecklare/) - Gothenburg Swede (2019-11-12)<br/>
> I worked on the website at: https://www.rormossenshumle.se/hem

- For the website and CMS I used PHP/REACT/NPM/Javascript/Wordpress/Custom Rest API Endpoints

#### This is a public repository with a MIT License and you are free to reuse the code as you want!
Read More:  https://choosealicense.com/licenses/mit

The repository contains a folder called redirect, this is the wordpress theme folder<br/>
For easy installation you can download as a zip-file and drag the folder to your Wordpress installation

#### Plugins used:

- CMB2 for custom metboxes and integration with the Rest API (Webdev Studios) https://github.com/CMB2/CMB2

- Plate A theme support plugin for WordPlate - Used in Wordpress (Vinkla) https://github.com/wordplate/plate

#### API Endpoins:

- Galleries per year: "IP/domain"/wp-json/rhg/v1/photo/year

- Galleries per month: "IP/domain"/wp-json/rhg/v1/photo/month<br/>
Param_1: year (/wp-json/rhg/v1/photo/month?year=2019)

- Show all gallery posts: "IP/domain"/wp-json/rhg/v1/photo<br/>
Param_1: year (/wp-json/rhg/v1/photo?year=2019)<br/>
Param_2: slug (/wp-json/rhg/v1/photo?slug=galleri-01)<br/>
Param_3: page (/wp-json/rhg/v1/photo?page=1&per_page=10)<br/>
Param_4: per_page (/wp-json/rhg/v1/photo?page=1&per_page=10&year=2019)

- Blogg posts per year: "IP/domain"/wp-json/rhg/v1/blogg/year

- Blogg posts per month: "IP/domain"/wp-json/rhg/v1/blogg/month<br/>
Param_1: year (/wp-json/rhg/v1/blogg/month?year=2019)

- Show all blogg posts: "IP/domain"/wp-json/rhg/v1/photo<br/>
Param_1: year (/wp-json/rhg/v1/blogg?year=2019)<br/>
Param_2: slug (/wp-json/rhg/v1/blogg?slug=blogg-01)<br/>
Param_3: page (/wp-json/rhg/v1/blogg?page=1&per_page=10)<br/>
Param_4: per_page (/wp-json/rhg/v1/blogg?page=1&per_page=10&year=2019)

#### Contributers:
| Fredrik Leemann
|----------------
| GitHub: [https://github.com/freddan88](https://github.com/freddan88 "freddan88@GitHub")
| WebPage: http://www.leemann.se/fredrik

#### Resources:
- https://placeholder.com
- https://wpcentral.io/internationalization
- https://github.com/CMB2/CMB2/wiki/REST-API
- https://developer.wordpress.org/rest-api/reference
- https://github.com/CMB2/CMB2/wiki/Field-Types#file_list
- https://wordpress.stackexchange.com/questions/108652/remove-custom-post-type-permalink