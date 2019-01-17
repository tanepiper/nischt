### nischt (ngx-script-helper)

A simple PHP script to speed up the translation setup for Angular apps using ngx-translate module.

#### Installation

In order to run the script, you need to have php installed on your machine. 

*Most Mac OS versions ship with PHP*, so it's very likely you won't have to do anything. If that's not the case, for more info on how to install it, click [here](https://medium.com/@romaninsh/install-php-7-2-on-macos-high-sierra-with-homebrew-bdc4d1b04ea6).

#### Usage

1. Define your constants on`input.txt` file;
2. Choose *source* and *target* language; 
3. Using English (`en`) as *source* (default) and Spanish (`en`) as *target*, open your Terminal and run `php translate.php en es`.

Now you can copy and paste the translations on your respective `.json` files.

**Note:** you need a valid key in order to use the Google Translation API. More info [here](https://cloud.google.com/translate/docs/reference/libraries).

![video](https://user-images.githubusercontent.com/6345197/51338319-1c3cdc80-1a4f-11e9-961f-130b1b75fb93.gif)
