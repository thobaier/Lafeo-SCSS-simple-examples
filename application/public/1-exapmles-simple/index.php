<?php
/**
 * Simple examples of using the "Leafo ScssPhp Compiler"
 *
 * @id          public/1-exapmles-simple/index.php
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

/*
 * Example 1
 */

# define some scss directly in code
$scssString = '  
  $block: block;
  $color: red;
  
  /* comments */
  span {
    display:$block;
  }
  div {
    display:$color;
    span {
        display:$block;
    }
  }
';

# compile the scss string
$cssString = $scss->compile($scssString);

# output the compiled css string
$scss->echo($cssString, 'example one'); // $cssString holds the string to use

/*
 * Example 2
 * Read from a scss file and output the compiled css
 */

// define filepath
$file = __DIR__ . '/../scss/example.scss';

// stop here if file not exists
if (!$scss->isFile($file)) {
    throw new Exception("Can't find your specified file: '{$file}'");
}

// read the input scss file
$scssString = file_get_contents($file);

# compile the scss string
$cssString = $scss->compile($scssString);

# output the compiled css string
$scss->echo($cssString, 'example two (scss from a file)');
