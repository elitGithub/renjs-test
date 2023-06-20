<?php

class YAMLFileHandler {
    private $file;

    public function __construct($filename) {
        $this->file = $filename;
    }

    public function displayForm() {
        $data = ['no' => 'file'];
        if (file_exists($this->file)) {
            $data = yaml_parse_file($this->file);
        }

        echo '<form>';
        // Display form elements based on $data
        // You can customize the form rendering as per your requirements

        echo '<input type="submit" name="action" value="Update" />';
        echo '<input type="submit" name="action" value="Create New" />';
        echo '</form>';

        var_dump($data);
    }

    public function updateFile($action) {
        $data = []; // Data to be written to the YAML file

        // Retrieve form data and populate $data accordingly

        if ($action === 'Create New') {
            // Create a new file
            $newFile = $this->file . '.new';
            $yamlData = yaml_emit($data);
            file_put_contents($newFile, $yamlData);
        } else {
            // Update existing file
            $yamlData = yaml_emit($data);
            file_put_contents($this->file, $yamlData);
        }
    }
}
