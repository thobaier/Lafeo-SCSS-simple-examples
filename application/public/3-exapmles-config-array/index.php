<?php
/**
 * Simple examples of using the "Leafo ScssPhp Compiler"
 *
 * @id          public/3-exapmles-folders/index.php
 * @author      Thomas Baier <thomas.baier.halle@gmail.com>
 * @date        01.04.2018
 * @license     MIT
 * @Copyright   2018 Thomas Baier
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

# include compiler namespace
use Thomasbaier\Scss\Compiler;

# require composer's autoloader
require __DIR__ . '/../../vendor/autoload.php';

# bind the compiler
$scss = new Compiler();

/**
 * Exampel 1
 * Build css string from all files in all given folders (recursive)
 */

# define some config
$sourcePath = __DIR__ . '/source';

$scssStringAll = '';

// check if folder exists
if ($scss->isDirectory($sourcePath)) {
    # loop over each file in folder
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourcePath));
    foreach ($iterator as $filename) {
        # if match a scss file and is readable
        if (
            pathinfo($filename, PATHINFO_EXTENSION) === 'scss'
            && $scss->isFile($filename)
        ) {
            # compile scss to css
            $scssString = file_get_contents($filename);
            $scss->setFormatter('Leafo\ScssPhp\Formatter\Crunched');
            $scssStringAll .= $scss->compile($scssString);
        }
    }

    // output the ready css
    $scss->echo($scssStringAll, 'example one');

    // or send as a valid css file
    /*
    ob_start("ob_gzhandler");
    header("Content-type: text/css; charset: UTF-8");
    header('Content-Disposition: attachment; filename=application.css');
    echo $scssStringAll;
    exit;
    */
}
