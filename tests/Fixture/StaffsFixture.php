<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffsFixture
 */
class StaffsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'staff_no' => 'Lorem ip',
                'profile' => 'Lorem ipsum dolor sit amet',
                'profile_dir' => 'Lorem ipsum dolor sit amet',
                'department_id' => 1,
                'status' => 1,
                'created' => '2025-06-29 22:29:13',
                'modified' => '2025-06-29 22:29:13',
            ],
        ];
        parent::init();
    }
}
