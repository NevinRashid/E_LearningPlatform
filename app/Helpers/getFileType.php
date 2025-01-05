<?php

    if (!function_exists('getFileType')) {
        /**
         * get the file type if it is an image,video,pdf or documentation
         * @param mixed $file
         * @return string
         */
        function getFileType($file) {
            // Get MIME type of the file
            $mimeType = mime_content_type($file);
            
            // Classify based on MIME type
            if (strpos($mimeType, 'image') !== false) {
                return 'image';
            } elseif (strpos($mimeType, 'video') !== false) {
                return 'video';
            } elseif ($mimeType === 'application/pdf') {
                return 'pdf';
            } elseif (strpos($mimeType, 'document') !== false || strpos($mimeType, 'msword') !== false) {
                return 'documentation';
            } else {
                return 'Unsupported file';
            }
        }
        
    }