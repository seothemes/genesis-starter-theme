#!/bin/bash
# Theme setup.

# Defaults
default_name="Genesis Starter Theme"
default_id="genesis-starter-theme"
default_author="SEO Themes"
default_author_url="https://seothemes.com"
default_package="SEOThemes\GenesisStarterTheme"
default_url="https://genesis-starter.test"

# Directories
basedir="$( cd "$( dirname "$0" )" && pwd )/."
assetsdir="$basedir/assets"
sassdir="$basedir/assets/scss"
basedir_all_files="$basedir/."
setup_script="$basedir/setup.sh"

# Text styles
bold=$(tput bold)
white=$(tput setaf 7)
pink=$(tput setaf 198)
green=$(tput setaf 2)
blue=$(tput setaf 4)
txtreset=$(tput sgr0)

echo "${bold}${blue}
                    __  __
   ________  ____  / /_/ /_  ___  ____ ___  ___  _____
  / ___/ _ \/ __ \/ __/ __ \/ _ \/ __ '__ \/ _ \/ ___/
 (__  ) ___/ /_/ / /_/ / / /  __/ / / / / / ___(__  )
/____/\___/\____/\__/_/ /_/\___/_/ /_/ /_/\___/____/

${txtreset}"
# echo "${bold}
              # Genesis Starter Theme
      # ${txtreset}"

echo "1) Set name for your theme. (Default: $default_name)"
read name

# use default if empty
if test -n "$name"; then
  echo ""
else
  name=$default_name
fi

echo "2) Set unique id for your theme. Use only a-z and _. (Default: $default_id)"
read id

# use default if empty
if test -n "$id"; then
  echo ""
else
  id=$default_id
fi

echo "3) Set the author name for your theme. Use only a-z and _. (Default: $default_author)"
read author

# use default if empty
if test -n "$author"; then
  echo ""
else
  author=$default_author
fi

echo "4) Set the author URL for your theme. Use only a-z and _. (Default: $default_author_url)"
read author_url

# use default if empty
if test -n "$author_url"; then
  echo ""
else
  author_url=$default_author_url
fi

echo "5) Set the package name for your theme. Use only a-z and _. (Default: $default_package)"
read package

# use default if empty
if test -n "$package"; then
  echo ""
else
  package=$default_package
fi

echo "6) Set local development url. Note: An SSL is required to use HTTPS (Default: $default_url)"
read url

# use default if empty
if test -n "$url"; then
  echo ""
else
  url=$default_url
fi

while true; do
read -p "9) Is following information correct?

name: ${bold}${pink}$name${txtreset} (Default: $default_name)
id: ${bold}${pink}$id${txtreset} (Default: $default_id)
author: ${bold}${pink}$author${txtreset} (Default: $default_author)
author_url: ${bold}${pink}$author_url${txtreset} (Default: $default_author_url)
package: ${bold}${pink}$package${txtreset} (Default: $default_package)
url: ${bold}${pink}$url${txtreset} (Default: $default_url)

Proceed to install? [y/N]
" yn
  case $yn in
    [Yy]* ) break;;
    [Nn]* ) exit;;
    * ) echo "Please answer y or n.";;
  esac
done

echo "
Run setup:
=========="

# ----------------------------------------------------------------
# Search & Replace Name
# ----------------------------------------------------------------

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# style.scss
find "$sassdir" -name 'style.scss' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# README.md
find "$basedir" -name 'README.md' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# package.json
find "$basedir" -name 'package.json' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

echo "--> Search & replace name ... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Search & Replace ID
# ----------------------------------------------------------------

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# style.scss
find "$sassdir" -name 'style.scss' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# package.json
find "$basedir" -name 'package.json' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

echo "--> Search & replace id ..... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author
# ----------------------------------------------------------------

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_author|$author|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_author|$author|g" {} \;

# style.scss
find "$sassdir" -name 'style.scss' -type f -exec perl -p -i -e "s|$default_author|$author|g" {} \;

# package.json
find "$basedir" -name 'package.json' -type f -exec perl -p -i -e "s|$default_author|$author|g" {} \;

echo "--> Change author name .............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author URL
# ----------------------------------------------------------------

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_author_url|$author_url|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_author_url|$author_url|g" {} \;

# style.scss
find "$sassdir" -name 'style.scss' -type f -exec perl -p -i -e "s|$default_author_url|$author_url|g" {} \;

# package.json
find "$basedir" -name 'package.json' -type f -exec perl -p -i -e "s|$default_author_url|$author_url|g" {} \;

echo "--> Change author URL .............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change package
# ----------------------------------------------------------------

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

# style.scss
find "$sassdir" -name 'style.scss' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

# package.json
find "$basedir" -name 'package.json' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

echo "--> Change package name .............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change dev URL
# ----------------------------------------------------------------

# Gulpfile.js
find "$basedir" -name 'Gulpfile.js' -type f -exec perl -p -i -e "s|$default_url|$url|g" {} \;

# gulpfile.js
find "$basedir" -name 'gulpfile.js' -type f -exec perl -p -i -e "s|$default_url|$url|g" {} \;

echo "--> Change url .............. ${green}done${txtreset}"

echo "--> ${green}Setup complete!${txtreset}"

# echo "--> setup.sh removed"
# rm "$setup_script"
