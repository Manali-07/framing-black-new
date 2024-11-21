<?php
require_once 'db_FB.inc.php';

class VideoHandler extends Database
{

    public function fetchVideos()
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT video_url FROM tbl_videopath");
            $stmt->execute();

            // Fetch all records using PDO
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error in fetchVideos: " . $e->getMessage();
            return [];
        }
    }
    // Insert a new video URL into the database
    public function insertVideo($video_url)
    {
        try {
            $stmt = $this->getConnection()->prepare("INSERT INTO tbl_videopath (video_url) VALUES (:video_url)");
            $stmt->bindParam(':video_url', $video_url);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error inserting video URL: " . $e->getMessage();
            return false;
        }
    }

    // Method to fetch the latest 4 videos
    public function fetchLatestVideos()
    {
        $sql = "SELECT * FROM tbl_videopath ORDER BY upload_date DESC LIMIT 4"; // Adjust column name if needed
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}


class ui3Img extends Database
{
    public function fetchTopcontent()
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT * FROM tbl_ui3images WHERE id = 1");
            $stmt->execute();

            // Fetch all records using PDO
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error in fetchImages: " . $e->getMessage();
            return [];
        }
    }
}

class PhotoHandler extends Database
{

    public function fetchImages($start_image, $images_per_page)
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT * FROM tbl_photogallery ORDER BY uploaded_on DESC LIMIT :start_image, :images_per_page");
            $stmt->bindParam(':start_image', $start_image, PDO::PARAM_INT);
            $stmt->bindParam(':images_per_page', $images_per_page, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error in fetchImages: " . $e->getMessage();
            return [];
        }
    }

    public function getTotalImages()
    {
        try {
            $stmt = $this->getConnection()->query("SELECT COUNT(*) AS total_images FROM tbl_photogallery");
            return $stmt->fetch(PDO::FETCH_ASSOC)['total_images'];
        } catch (Exception $e) {
            echo "Error in getTotalImages: " . $e->getMessage();
            return 0;
        }
    }
}

//admin Image upload handler
class ImgUploadHandler extends Database
{

    // Insert image URL into the database
    public function insertImage($image_url)
    {
        try {
            $stmt = $this->getConnection()->prepare("INSERT INTO tbl_photogallery (image_path) VALUES (:image_url)");
            $stmt->bindParam(':image_url', $image_url);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error inserting image: " . $e->getMessage();
            return false;
        }
    }

    // Delete image from the database
    public function deleteImage($image_id)
    {
        try {
            $stmt = $this->getConnection()->prepare("DELETE FROM tbl_photogallery WHERE id = :image_id");
            $stmt->bindParam(':image_id', $image_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting image: " . $e->getMessage();
            return false;
        }
    }

    // Fetch all images from the database
    public function fetchImages()
    {
        try {
            $stmt = $this->getConnection()->query("SELECT * FROM tbl_photogallery ORDER BY uploaded_on DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error fetching images: " . $e->getMessage();
            return [];
        }
    }
}

//Admin Video upload handle

class VideoUploadHandler extends Database
{

    // Insert video data into the database
    public function insertVideo($video_url)
    {
        try {
            $stmt = $this->getConnection()->prepare("INSERT INTO tbl_videopath (video_url) VALUES (:video_url)");
            $stmt->bindParam(':video_url', $video_url);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error inserting video URL: " . $e->getMessage();
            return false;
        }
    }

    // Fetch video URLs
    public function fetchVideos()
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT id, video_url FROM tbl_videopath");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }

    // Delete a video by ID
    public function deleteVideo($video_id)
    {
        try {
            $stmt = $this->getConnection()->prepare("DELETE FROM tbl_videopath WHERE id = :video_id");
            $stmt->bindParam(':video_id', $video_id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting video: " . $e->getMessage();
            return false;
        }
    }
}
class admin_ui3content extends Database
{
    private $user_url; // Property to store the user-uploaded URL
    public function upload3data($urls)
    {
        // Check if a record with id = 1 exists
        $check_sql = "SELECT id FROM tbl_ui3images WHERE id = 1";
        $result = $this->getConnection()->query($check_sql);

        // Prepare SQL based on whether the record exists
        if ($result->rowCount() > 0) {
            $sql = "UPDATE tbl_ui3images SET 
                image1 = :image1, 
                image2 = :image2, 
                image3 = :image3 
                WHERE id = 1";
        } else {
            $sql = "INSERT INTO tbl_ui3images (image1, image2, image3) VALUES (:image1, :image2, :image3)";
        }

        // Prepare the statement
        $stmt = $this->getConnection()->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':image1', $urls[0]);
        $stmt->bindParam(':image2', $urls[1]);
        $stmt->bindParam(':image3', $urls[2]);

        // Execute the SQL query
        if ($stmt->execute()) {
            return "Content updated successfully!";
        } else {
            $errorInfo = $stmt->errorInfo();
            return "Error updating content: " . $errorInfo[2];
        }
    }


    public function fetchContent()
    {
        $fetch_sql = "SELECT image1, image2, image3 FROM tbl_ui3images WHERE id = 1";
        return $this->getConnection()->query($fetch_sql);
    }

    public function updateSingleURL($image_id, $new_url)
    {
        // Save the user-uploaded URL for later use
        $this->user_url = $new_url;

        // Validate the new URL
        if (!$this->isValidUrl($new_url)) {
            return "Invalid URL: $new_url";
        }

        // Convert the new URL to embeddable 'src'
        $embed_url = $this->getEmbedUrl($new_url);

        // Extract the src attribute from the embed URL (if it's an iframe)
        $src_url = $this->extractSrcFromIframe($embed_url);

        // Prepare the SQL update statement
        $update_sql = "UPDATE tbl_ui3images SET image{$image_id} = :new_url WHERE id = 1";
        $stmt = $this->getConnection()->prepare($update_sql);
        $stmt->bindParam(':new_url', $src_url);

        // Execute the SQL query
        if ($stmt->execute()) {
            return "URL updated successfully!";
        } else {
            return "Error updating URL: " . implode(", ", $stmt->errorInfo());
        }

    }

    private function extractSrcFromIframe($url)
    {
        // Here, we assume the URL is already in an embeddable format
        return $url; // If the input is an iframe, return the src part
    }
    private function isValidUrl($url)
    {
        // Check if the URL is a valid YouTube or Vimeo link or an image URL
        $youtubePattern = '/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/';
        $vimeoPattern = '/^(https?\:\/\/)?(www\.)?vimeo\.com\/.+$/';
        $imagePattern = '/\.(jpg|jpeg|png|gif|bmp|webp|svg)$/i';

        return preg_match($youtubePattern, $url) || preg_match($vimeoPattern, $url) || preg_match($imagePattern, $url);
    }

    public function getEmbedUrl($url)
    {
        // Check if it's a YouTube URL
        if (strpos($url, 'youtube.com/watch') !== false || strpos($url, 'youtu.be') !== false) {
            // Convert YouTube URL to embed format
            return str_replace('watch?v=', 'embed/', preg_replace('/youtu.be\//', 'www.youtube.com/embed/', $url));
        }
        // Check if it's a Vimeo URL
        elseif (strpos($url, 'vimeo.com') !== false) {
            return str_replace('vimeo.com/', 'player.vimeo.com/video/', $url);
        }
        // Return the original URL if it's neither YouTube nor Vimeo
        return $url;
    }

}

class admin_Uivideos extends Database
{
    public function saveVideo($videoUrl, $videoDescription)
    {
        $query = "INSERT INTO tbl_ui4data (video_url, video_description) VALUES (:video_url, :video_description)";
        $stmt = $this->getConnection()->prepare($query);

        // Bind parameters using PDO syntax
        $stmt->bindParam(':video_url', $videoUrl);
        $stmt->bindParam(':video_description', $videoDescription);

        // Execute the statement and return the result
        return $stmt->execute();
    }

    public function fetchVideos()
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT id, video_url, video_description FROM tbl_ui4data");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching videos: " . $e->getMessage());
            return [];
        }
    }

    // Delete a video by ID
    public function deleteVideo($video_id)
    {
        try {
            $stmt = $this->getConnection()->prepare("DELETE FROM tbl_ui4data WHERE id = :video_id");
            $stmt->bindParam(':video_id', $video_id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Error deleting video: " . $e->getMessage();
            return false;
        }
    }
}

class Uivideos extends Database
{
    // Method to fetch video data
    public function fetchVideos()
    {
        try {
            $stmt = $this->getConnection()->prepare("SELECT video_url, video_description FROM tbl_ui4data");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error in fetchVideos: " . $e->getMessage();
            return [];
        }
    }
}


