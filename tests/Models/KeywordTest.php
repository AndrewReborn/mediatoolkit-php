<?php

namespace Tests\Models;

use Carbon\Carbon,
    Mediatoolkit\Models\Keyword,
    PHPUnit\Framework\TestCase;

class KeywordTest extends TestCase
{
    const TEST_MODEL_ACTIVE          = true;
    const TEST_MODEL_GROUP_ID        = 0;
    const TEST_MODEL_ID              = 123;
    const TEST_MODEL_LAST_EDIT       = 1500630429;
    const TEST_MODEL_NAME            = 'name';
    const TEST_MODEL_NATURAL_QUERY = true;

    public function testKeywordGetters()
    {
        $model = new Keyword(
            [
                Keyword::DATA_GROUP_ID_KEY      => self::TEST_MODEL_GROUP_ID,
                Keyword::DATA_ID_KEY            => self::TEST_MODEL_ID,
                Keyword::DATA_IS_ACTIVE_KEY     => self::TEST_MODEL_ACTIVE,
                Keyword::DATA_LAST_EDIT_KEY     => self::TEST_MODEL_LAST_EDIT,
                Keyword::DATA_NAME_KEY          => self::TEST_MODEL_NAME,
                Keyword::DATA_NATURAL_QUERY_KEY => self::TEST_MODEL_NATURAL_QUERY
            ]
        );

        // Check if the Last Edit field is an instance of Carbon
        $this->assertInstanceOf(Carbon::class, $model->getLastEdit());
        
        $this->assertEquals(
            [
                self::TEST_MODEL_ACTIVE,
                self::TEST_MODEL_GROUP_ID,
                self::TEST_MODEL_ID,
                self::TEST_MODEL_LAST_EDIT,
                self::TEST_MODEL_NAME,
                self::TEST_MODEL_NATURAL_QUERY
            ], [
                $model->isActive,
                $model->getGroupId(),
                $model->getId(),
                $model->getLastEdit()->timestamp,
                $model->name,
                $model->naturalQuery
            ]
        );
    }
}