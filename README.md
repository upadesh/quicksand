# Quicksand
Quicksand comes with 3 ready-to-use color-schemes, one with rounded, two with cornered boxes. Its responsive design is based on Bootstrap 4, so your page will always look fine on any device. The theme is highly configurable, so you can easily adjust it to your needs, by using the theme-options inside your customizer.  Choose between masonry- and normal-, fullwidth- or boxed-layout, none, one or two sidebars and there were also added two better looking archive- & category-widgets. Quicksand also comes with a social-icon-integration, by using the fantastic FontAwesome image-library. You are able to apply Google-Fonts, galleries can be displayed by the stunning Lightgallery-plugin and if you feel to use a slider on your frontpage, no worries, Flexslider is integrated.

## Release
### Change version in files
- Readme.txt
- style.css    
- package.json
- functions.php
	
### Reinstall npm-modules

```
rm -Rf node_modules
npm install
``` 

### Build css- & js-files

```
grunt build 
```  


### Change line-endings via netbeans-plugin

Use the Line-Endings-plugin in Netbeans 'Show and change line-endings' 

#### Adjust line-endings in these files 
- js/lightgallery/js/lightgallery.js
- js/lightgallery/css/lg-fb-comment-box.css 
- js/lg-thumbnail.js

### Commit & push the whole thing

### Copy the quicksand-folder to a new location

```
cp -Rv wp-content/themes/quicksand /tmp
cd /tmp/quicksand 
```


### Delete development-files & -folders	 

```
rm -Rf node_modules
rm -Rf dev
rm -f package.json
rm -f Gruntfile.js
``` 


#### all hidden files
- .DS_Store
- .dS_Store
- .a.swp
- .netbeans.xml	

```
find . -iname '.*' -type f -delete
```
  
### zip the whole thing
```
cd ..; zip -r quicksand.zip quicksand
```  


## Development
### No FTP please

```
cd  wp 
vim wp-config.php 
	define('FS_METHOD', 'direct');
sudo chown -R name:group ../wp/
```

### Install Plugins
- [Theme-Check](http://ottopress.com/wordpress-plugins/theme-check/ )
- [NS Theme-Check](https://github.com/WPTRT/theme-sniffer )

### Install XML-Unit-Test 
[XML-Unit-Test](https://codex.wordpress.org/Theme_Unit_Test)


### Install node, sass & grunt
```
sudo apt-get update
sudo apt-get install nodejs nodejs-legacy npm  ruby 

sudo su -c "gem install sass"

sudo npm  -g install grunt grunt-cli coffee-script jshint node-gyp
```

### Upload URL
[Submit Theme](https://wordpress.org/themes/upload/)

### Install Quicksand
```
cd /tmp
git clone https://github.com/piccard21/quicksand.git
mv quicksand/.git* /var/www/wp/
mv quicksand/wp-content/themes/quicksand/ /var/www/wp/wp-content/themes/
cd /var/www/wp/wp-content/themes/quicksand

npm install
grunt build
grunt 
```


