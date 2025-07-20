<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TypesFixture
 */
class TypesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor ',
                'max_days' => 1,
                'status' => 1,
                'created' => '2025-06-29 19:04:52',
                'modified' => '2025-06-29 19:04:52',
            ],
        ];
        parent::init();
    }
}
