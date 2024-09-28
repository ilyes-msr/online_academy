<?php

if (!function_exists('youtube_embed')) {
  /**
   * Generate responsive YouTube embed code dynamically.
   *
   * @param string $url
   * @param float $aspect_ratio (e.g. 16/9 for widescreen)
   * @return string
   */
  function youtube_embed($url, $aspect_ratio = 16 / 9)
  {
    // Extract YouTube video ID
    if (preg_match('/youtu.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
      $videoId = $matches[1];
    } elseif (preg_match('/v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
      $videoId = $matches[1];
    } else {
      return 'Invalid YouTube URL';
    }

    // Calculate padding-bottom based on the aspect ratio
    $paddingBottom = 100 / $aspect_ratio;

    // Return the responsive embed code
    return '
        <div style="position: relative; width: 100%; height: 0; padding-bottom: ' . $paddingBottom . '%;">
            <iframe src="https://www.youtube.com/embed/' . $videoId . '" 
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
            </iframe>
        </div>';
  }
}
