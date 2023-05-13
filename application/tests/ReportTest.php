<?php

use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase
{
    private $CI;

    public function setUp(): void
    {
        // Load the CodeIgniter instance
        $this->CI = &get_instance();
        $this->CI->load->model('Report_model');
    }

    public function testGetAll()
    {
        $reports = $this->CI->Report_model->getAll();
        $this->assertIsArray($reports);
    }

    // Add other test methods for your controller's methods
}
