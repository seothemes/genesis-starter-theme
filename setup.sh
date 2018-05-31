#!/bin/bash
# Theme setup.

# Defaults
default_name="Genesis Starter Theme"
default_id="genesis-starter-theme"
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

echo "3) Set local development url. (Default: $default_url)"
read url

# use default if empty
if test -n "$url"; then
  echo ""
else
  url=$default_url
fi

while true; do
read -p "4) Is following information correct?

name: ${bold}${pink}$name${txtreset} (Default: $default_name)
id: ${bold}${pink}$id${txtreset} (Default: $default_id)
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
# Change dev URL
# ----------------------------------------------------------------

# Gulpfile.js
find "$basedir" -name 'Gulpfile.js' -type f -exec perl -p -i -e "s|$default_url|$url|g" {} \;

echo "--> Change url .............. ${green}done${txtreset}"

echo "--> ${green}Setup complete!${txtreset}"

# echo "--> setup.sh removed"
# rm "$setup_script"
