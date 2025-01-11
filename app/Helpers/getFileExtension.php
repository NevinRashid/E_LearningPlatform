<?php

    if (!function_exists('getFileExtension')) {
        /**
         * get the extension of the received file
         * @param mixed $file //received file from the form
         * @return string
         */
        function getFileExtension($file) {
            return strtolower(pathinfo($file, PATHINFO_EXTENSION));
            
        }
    }