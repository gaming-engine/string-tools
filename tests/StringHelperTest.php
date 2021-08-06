<?php

namespace GamingEngine\StringTools\Tests;

use GamingEngine\StringTools\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    /**
     * @test
     */
    public function nothing_changes_if_there_are_no_values()
    {
        // Arrange
        $template = 'foo{bar}';

        // Act
        $response = StringHelper::template($template);

        // Assert
        $this->assertEquals($template, $response);
    }

    /**
     * @test
     */
    public function nothing_changes_if_there_are_no_templated_objects()
    {
        // Arrange
        $template = 'foo-bar';

        // Act
        $response = StringHelper::template($template);

        // Assert
        $this->assertEquals($template, $response);
    }

    /**
     * @test
     */
    public function single_values_are_replaced()
    {
        // Arrange
        $template = 'foo{bar}';

        // Act
        $response = StringHelper::template($template, [
            'bar' => 'testing'
        ]);

        // Assert
        $this->assertEquals('footesting', $response);
    }

    /**
     * @test
     */
    public function single_values_are_replaced_multiple_times()
    {
        // Arrange
        $template = 'foo{bar}-{bar}';

        // Act
        $response = StringHelper::template($template, [
            'bar' => 'testing'
        ]);

        // Assert
        $this->assertEquals('footesting-testing', $response);
    }

    /**
     * @test
     */
    public function multiple_values_are_replaced()
    {
        // Arrange
        $template = 'foo{bar}-{foobar}';

        // Act
        $response = StringHelper::template($template, [
            'bar' => 'testing',
            'foobar' => 'blarg'
        ]);

        // Assert
        $this->assertEquals('footesting-blarg', $response);
    }
}