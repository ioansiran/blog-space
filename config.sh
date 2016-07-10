wget https://github.com/smarty-php/smarty/archive/v3.1.29.tar.gz
tar -zxvf v3.1.29.tar.gz
mkdir Smarty
cp -r smarty-3.1.29/libs/* Smarty/
rm -rf v3.1.29.tar.gz smarty-3.1.29
mkdir smarty
mkdir smarty/templates
mkdir smarty/templates_c
mkdir smarty/cache
mkdir smarty/configs
chmod 775 smarty/templates_c
chmod 775 smarty/cache
echo "DONE :)"