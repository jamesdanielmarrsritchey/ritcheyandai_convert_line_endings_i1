<?php
function convertLineEndings($string, $toType) {
    // Normalize line endings to Unix style
    $normalizedString = str_replace(["\r\n", "\r"], "\n", $string);

    // Convert line endings based on the target type
    if ($toType === 'Windows') {
        // Convert to Windows (CRLF)
        return str_replace("\n", "\r\n", $normalizedString);
    } elseif ($toType === 'Linux') {
        // Already converted to Unix/Linux (LF), return normalized string
        return $normalizedString;
    } else {
        // Invalid type, return original string without changes
        return $string;
    }
}
?>