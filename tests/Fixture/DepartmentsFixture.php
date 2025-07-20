<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DepartmentsFixture
 */
class DepartmentsFixture extends TestFixture
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
                'role' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2025-06-29 19:04:05',
                'modified' => '2025-06-29 19:04:05',
            ],
        ];
        parent::init();
    }
}
