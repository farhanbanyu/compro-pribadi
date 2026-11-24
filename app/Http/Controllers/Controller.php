<?php

namespace App\Http\Controllers;

use InvalidArgumentException;

abstract class Controller
{
    public function upload($file, $folder)
    {
        try {
            $folder = trim($folder, '/');
            $path = 'storage/upload/' . $folder;
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $extension = $file->getClientOriginalExtension();
            $filename = rand(100000, 999999) . '_' . time() . '.' . $extension;
            $file->move($path, $filename);

            return $path . '/' . $filename;
        } catch (\Throwable $th) {
            throw new InvalidArgumentException($th->getMessage(), 500);
        }
    }

    // Function to upload PDF files
    public function uploadPdf($pdf, $folder)
    {
        try {
            $folder_ext = explode('/', $folder);
            $path = 'storage/upload/' . $folder;
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $extension = $pdf->getClientOriginalExtension();
            if (strtolower($extension) !== 'pdf') {
                throw new InvalidArgumentException('File is not a PDF', 415);
            }
            $file = rand(100000, 999999) . '_' . $folder_ext[0] . '.' . $extension;
            $pdf->move($path, $file);
            return $path . '/' . $file;
        } catch (\Throwable $th) {
            throw new InvalidArgumentException($th->getMessage(), 500);
        }
    }

    public function uploadVideo($video, $folder)
    {
        try {
            $folder_ext = explode('/', $folder);
            $uploadPath = 'storage/upload/' . $folder;
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $extension = $video->getClientOriginalExtension();
            $allowed = ['mp4', 'avi', 'mov', 'mkv', 'webm', 'wmv'];
            if (!in_array(strtolower($extension), $allowed)) {
                throw new InvalidArgumentException('File type not supported for video upload', 415);
            }
            $fileName = rand(100000, 999999) . '_' . $folder_ext[0] . '.' . $extension;
            $video->move($uploadPath, $fileName);
            return $uploadPath . '/' . $fileName;
        } catch (\Throwable $th) {
            throw new InvalidArgumentException($th->getMessage(), 500);
        }
    }


    function deleteFile($img)
    {
        if (file_exists($img)) {
            unlink($img);
        }
    }
}
