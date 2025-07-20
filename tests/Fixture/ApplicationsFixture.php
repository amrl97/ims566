<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsFixture
 */
class ApplicationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'staff_id' => 1,
                'department_id' => 1,
                'type_id' => 1,
                'start_date' => '2025-07-18',
                'end_date' => '2025-07-18',
                'reason' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'image_dir' => 'Lorem ipsum dolor sit amet',
                'approval_status' => 1,
                'status' => 1,
                'created' => '2025-07-18 04:35:15',
                'modified' => '2025-07-18 04:35:15',
            ],
        ];
        parent::init();
    }
}
