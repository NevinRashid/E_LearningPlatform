<?php

    if (!function_exists('storageFolder')) {
        /**
         * decides which folder or directory the will stored in
         * @param mixed $type //type of the file
         * @param mixed $file //the file received from the form
         * @return mixed //return the file path according to its type
         */
        function storageFolder($type,$file) {
            
                switch($type){
                    case 'image':
                        $path=uploadFile($file,"images");
                        return $path;
                        break;
                        case 'pdf':
                            $path=uploadFile($file,"pdf");
                            return $path;
                            break;
                            case 'documentation':
                                $path=uploadFile($file,"documents");
                                return $path;
                                break;
                                case 'video':
                                    $path=uploadFile($file,"videos");
                                    return $path;
                                    break;
                }
            
        }
    }