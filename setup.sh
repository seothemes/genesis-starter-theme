#!/bin/bash
# Theme setup.

# Defaults
default_name="Genesis Starter Theme"
default_id="genesis-starter-theme"
default_author="SEO Themes"
default_author_url="https://seothemes.com"
default_url="genesis-starter.test"
default_namespace="SeoThemes\GenesisStarterTheme"
default_company="${default_namespace%\\*}"
default_package="${default_namespace#*\\}"
default_version=`perl -ne 'print if /(?:\"version\": \")(.*?)(?:\")/' './package.json'`

# Files
bs='\'
setup_sh="./setup.sh"
functions_php="./functions.php"
config_php="./config/defaults.php"
package_json="./package.json"
composer_json="./composer.json"
gulpfile="./Gulpfile.js"
readme="./README.md"
changelog="./CHANGELOG.md"

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
              # Startup Pro
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

echo "5) Set the namespace for your theme. Use only a-z and _. (Default: $default_namespace)"
read -r namespace

# use default if empty
if test -n "$namespace"; then
  echo ""
else
  namespace=$default_namespace
fi

company="${namespace%\\*}"
package="${namespace#*\\}"

echo "6) Set local development url. Note: An SSL is required to use HTTPS (Default: $default_url)"
read url

# use default if empty
if test -n "$url"; then
  echo ""
else
  url=$default_url
fi


# "version": "1.2.3",
clean_version="${default_version//\"/}"
clean_version="${clean_version//version: /}"
clean_version="${clean_version//,/}"
clean_version="${clean_version// /}"

echo "7) Set version number for your theme. (Default: $clean_version)"
read version

# use default if empty
if test -n "$version"; then
  echo ""
else
  version=$clean_version
fi

echo "
Run setup:
=========="

# ----------------------------------------------------------------
# Search & Replace Name
# ----------------------------------------------------------------

perl -p -i -e "s|$default_name|$name|g" $functions_php
perl -p -i -e "s|$default_name|$name|g" $config_php
perl -p -i -e "s|$default_name|$name|g" $package_json
perl -p -i -e "s|$default_name|$name|g" $composer_json
perl -p -i -e "s|$default_name|$name|g" $gulpfile
perl -p -i -e "s|$default_name|$name|g" $readme
perl -p -i -e "s|$default_name|$name|g" $changelog

echo "1/8 --> Search & replace name ........ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Search & Replace ID
# ----------------------------------------------------------------

perl -p -i -e "s|$default_id|$id|g" $functions_php
perl -p -i -e "s|$default_id|$id|g" $config_php
perl -p -i -e "s|$default_id|$id|g" $package_json
perl -p -i -e "s|$default_id|$id|g" $composer_json
perl -p -i -e "s|$default_id|$id|g" $gulpfile
perl -p -i -e "s|$default_id|$id|g" $readme

echo "2/8 --> Search & replace id .......... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author
# ----------------------------------------------------------------

perl -p -i -e "s|$default_author|$author|g" $functions_php
perl -p -i -e "s|$default_author|$author|g" $config_php
perl -p -i -e "s|$default_author|$author|g" $package_json
perl -p -i -e "s|$default_author|$author|g" $composer_json
perl -p -i -e "s|$default_author|$author|g" $gulpfile
perl -p -i -e "s|$default_author|$author|g" $readme

echo "3/8 --> Change author name ........... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author URL
# ----------------------------------------------------------------

perl -p -i -e "s|$default_author_url|$author_url|g" $functions_php
perl -p -i -e "s|$default_author_url|$author_url|g" $config_php
perl -p -i -e "s|$default_author_url|$author_url|g" $package_json
perl -p -i -e "s|$default_author_url|$author_url|g" $composer_json
perl -p -i -e "s|$default_author_url|$author_url|g" $gulpfile
perl -p -i -e "s|$default_author_url|$author_url|g" $readme

echo "4/8 --> Change author URL ............ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change namespace
# ----------------------------------------------------------------

perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $functions_php
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $config_php
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $package_json
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $gulpfile
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $readme
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $composer_json

perl -p -i -e "s|$default_company|$company|g" $composer_json
perl -p -i -e "s|$default_package|$package|g" $composer_json

echo "5/8 --> Change namespace ............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change dev URL
# ----------------------------------------------------------------

perl -p -i -e "s|$default_url|$url|g" $gulpfile

echo "6/8 --> Change dev URL ............... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Update defaults
# ----------------------------------------------------------------

perl -p -i -e "s|$default_name|$name|g" $setup_sh
perl -p -i -e "s|$default_id|$id|g" $setup_sh
perl -p -i -e "s|$default_author|$author|g" $setup_sh
perl -p -i -e "s|$default_author_url|$author_url|g" $setup_sh
perl -p -i -e "s|$default_url|$url|g" $setup_sh
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $setup_sh

echo "7/8 --> Updating defaults ............ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Reset version
# ----------------------------------------------------------------

formatted_version="  \"version\": \"${version}\","

perl -p -i -e "s|$default_version|$formatted_version|g" './package.json'

echo "8/8 --> Updating version ............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Build theme
# ----------------------------------------------------------------

build="gulp build"
${build}

dump="composer dump-autoload"
${dump}

echo "${green}Setup complete, starting BrowserSync...${txtreset}"

serve="gulp serve"
${serve}
