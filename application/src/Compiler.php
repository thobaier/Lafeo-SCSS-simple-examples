<?php
/**
 * An extend of the Leafo Compiler.
 * This class isn't really a compiler but more a helper.
 * Dont confuse, it's just to provide some helpers for the examples
 *
 * @id          compiler.php
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

namespace Thomasbaier\Scss;

use Leafo\ScssPhp\Compiler as ScssCompiler;

class Compiler extends ScssCompiler
{
    /**
     * Compiler constructor.
     */
    public function __construct()
    {
        // call parent consructor
        parent::__construct();
    }

    /**
     * @param string $cssString
     * @param string|null $heading
     */
    public function echo(string $cssString, string $heading = null): void
    {
        // check if we got a heading
        if ($heading) {
            echo "<h3>{$heading}</h3>";
        }
        // output the compiled css
        echo "<pre>{$cssString}</pre>";
    }

    /**
     * @param string $filePath
     * @return bool
     */
    public function isFile(string $filePath): bool
    {
        return is_file($filePath) && is_readable($filePath);
    }

    /**
     * @param string $directoryPath
     * @return bool
     */
    public function isDirectory(string $directoryPath): bool
    {
        return is_dir($directoryPath) && is_readable($directoryPath);
    }
}
