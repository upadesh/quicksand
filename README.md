# Quicksand
Quicksand comes with 2 ready-to-use color-schemes, one with rounded, the other one with cornered boxes. Its responsive design is based on Bootstrap4, so your page will always look fine on any device. The theme is highly configurable, so you can easily adjust it to your needs, by using the theme-options inside your customizer.  Choose between masonry- and normal-, fullwidth- or boxed-layout, none, one or two sidebars and there were also added two better looking archive- & category-widgets. Quicksand also comes with a social-icon-integration, by using the fantastic FontAwesome image-library. You are able to apply Google-Fonts, galleries can be displayed by the stunning Lightgallery-plugin and if you feel to use a slider on your frontpage, no worries, Flexslider is integrated.  For the nerds of you, there are also sass- and grunt files included.

## Release
### Change version in files
- Readme.md
- Readme.txt
- style.css    
	
### Reinstall npm-modules

```
rm -Rf node_modules
npm install
``` 

### Build css- & js-files

```
grunt build 
```  


###Change line-endings via netbeans-plugin

Use the Line-Endings-plugin in Netbeans 'Show and change line-endings' 

#### Adjust line-endings in these files
- js/lightgallery/lightgallery.min.js
- js/lightgallery/lightgallery.js
- js/lightgallery/css/lg-fb-comment-box.css
- js/lg-thumbnail.min.js
- js/lg-thumbnail.js


### Copy the quicksand-folder to a new location

```
cp -R themes/quicksand /tmp
cd /tmp/quicksand 
```


	
### Delete node_modules-folder again
```
rm -Rf node_modules
```


### Delete all hidden files
- .DS_Store
- .dS_Store
- .a.swp
- .netbeans.xml	


```
find . -iname '.*' -type f -delete
```



### zip the whole thing
```
zip -r quicksand.zip quicksand
```  


## Development
### Install XML-Unit-Test 

```
cd  wp 
vim wp-config.php 
	define('FS_METHOD', 'direct');
sudo chown -R piccard:www-data ../wp/
```

### Install node, sass & grunt
```
sudo apt-get update
sudo apt-get install nodejs nodejs-legacy npm  ruby 

sudo su -c "gem install sass"

sudo npm  -g install grunt grunt-cli coffee-script jshint node-gyp
```

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


