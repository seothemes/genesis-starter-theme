#!/bin/bash
# Theme setup.

# Defaults
default_name="Component Boilerplate"
default_desc="Description of the components expected behavior."
default_id="component-boilerplate"
default_author="D2 Themes"
default_author_url="https://d2themes.com"
default_namespace="D2\Core"
default_company="${default_namespace%\\*}"
default_package=`$default_name | sed 's/ //g'`
default_version=`perl -ne 'print if /(?:\"version\": \")(.*?)(?:\")/' '../../../composer.json'`

# Files
bs='\'
setup_sh="./setup.sh"
src_php="./src/ComponentBoilerplate.php"
composer_json="./composer.json"
readme="./README.md"
changelog="./CHANGELOG.md"

# Text styles
bold=$(tput bold)
white=$(tput setaf 7)
pink=$(tput setaf 198)
green=$(tput setaf 2)
blue=$(tput setaf 4)
txtreset=$(tput sgr0)

echo "1) Set name for your component. (Default: $default_name)"
read name

# use default if empty
if test -n "$name"; then
  echo ""
else
  name=$default_name
fi

echo "2) Set description for your component. Use only lowercase a-z and -. (Default: $default_desc)"
read desc

# use default if empty
if test -n "$desc"; then
  echo ""
else
  desc=$default_desc
fi

echo "3) Set unique id for your component. Use only lowercase a-z and -. (Default: $default_id)"
read id

# use default if empty
if test -n "$id"; then
  echo ""
else
  id=$default_id
fi

echo "4) Set the author name for your component. Use only a-z and _. (Default: $default_author)"
read author

# use default if empty
if test -n "$author"; then
  echo ""
else
  author=$default_author
fi

echo "5) Set the author URL for your component. Use only a-z and _. (Default: $default_author_url)"
read author_url

# use default if empty
if test -n "$author_url"; then
  echo ""
else
  author_url=$default_author_url
fi

echo "6) Set the namespace for your component. Use only a-z and _. (Default: $default_namespace)"
read -r namespace

# use default if empty
if test -n "$namespace"; then
  echo ""
else
  namespace=$default_namespace
fi

company="${namespace%\\*}"
package="${namespace#*\\}"

# "version": "1.2.3",
clean_version="${default_version//\"/}"
clean_version="${clean_version//version: /}"
clean_version="${clean_version//,/}"
clean_version="${clean_version// /}"

echo "7) Set version number for your component. (Default: $clean_version)"
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

perl -p -i -e "s|$default_name|$name|g" $src_php
perl -p -i -e "s|$default_name|$name|g" $composer_json
perl -p -i -e "s|$default_name|$name|g" $readme

echo "1/8 --> Search & replace name ........ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Search & Replace Description
# ----------------------------------------------------------------

perl -p -i -e "s|$default_desc|$desc|g" $src_php
perl -p -i -e "s|$default_desc|$desc|g" $composer_json
perl -p -i -e "s|$default_desc|$desc|g" $readme

echo "2/8 --> Search & replace description .......... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Search & Replace ID
# ----------------------------------------------------------------

perl -p -i -e "s|$default_id|$id|g" $src_php
perl -p -i -e "s|$default_id|$id|g" $composer_json
perl -p -i -e "s|$default_id|$id|g" $readme

echo "2/8 --> Search & replace id .......... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author
# ----------------------------------------------------------------

perl -p -i -e "s|$default_author|$author|g" $src_php
perl -p -i -e "s|$default_author|$author|g" $composer_json
perl -p -i -e "s|$default_author|$author|g" $readme

echo "3/8 --> Change author name ........... ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change author URL
# ----------------------------------------------------------------

perl -p -i -e "s|$default_author_url|$author_url|g" $src_php
perl -p -i -e "s|$default_author_url|$author_url|g" $composer_json
perl -p -i -e "s|$default_author_url|$author_url|g" $readme

echo "4/8 --> Change author URL ............ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Change namespace
# ----------------------------------------------------------------

perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $src_php
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $readme
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $composer_json

perl -p -i -e "s|$default_company|$company|g" $composer_json
perl -p -i -e "s|$default_package|$package|g" $composer_json

echo "5/8 --> Change namespace ............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Search & Replace Name
# ----------------------------------------------------------------

perl -p -i -e "s|$default_package|$package|g" $src_php
perl -p -i -e "s|$default_package|$package|g" $composer_json
perl -p -i -e "s|$default_package|$package|g" $readme

old_name="./src/${default_package}.php"
new_name="./src/${package}.php"

mv $old_name $new_name

echo "6/8 --> Search & replace name ........ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Update defaults
# ----------------------------------------------------------------

perl -p -i -e "s|$default_name|$name|g" $setup_sh
perl -p -i -e "s|$default_id|$id|g" $setup_sh
perl -p -i -e "s|$default_author|$author|g" $setup_sh
perl -p -i -e "s|$default_author_url|$author_url|g" $setup_sh
perl -p -i -e "s|\Q$default_company$bs$default_package\E|$company$bs$bs$package|g" $setup_sh

echo "7/8 --> Updating defaults ............ ${green}done${txtreset}"

# ----------------------------------------------------------------
# Reset version
# ----------------------------------------------------------------

formatted_version="  \"version\": \"${version}\","

perl -p -i -e "s|$default_version|$formatted_version|g" './composer.json'

echo "8/8 --> Updating version ............. ${green}done${txtreset}"

# ----------------------------------------------------------------
# Build component
# ----------------------------------------------------------------

echo "${green}Setup complete, starting BrowserSync...${txtreset}"

# rm -Rf $setup_sh