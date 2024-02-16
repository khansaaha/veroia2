<?php 

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use App\Services\ClipDropService;

class ClipDropControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the ClipDropService to avoid actual API calls
        $this->app->bind(ClipDropService::class, function ($app) {
            return $this->createMock(ClipDropService::class);
        });
    }

    /** @test */
    public function it_removes_background_using_clipdrop_api()
    {
        // Arrange
        $fakeImage = UploadedFile::fake()->image('test-image.png');
        $fakeApiResponse = 'Fake API response';

        // Mock the ClipDropService response
        $clipDropServiceMock = $this->app->make(ClipDropService::class);
        $clipDropServiceMock->expects($this->once())
            ->method('removeBackground')
            ->with($this->equalTo($fakeImage))
            ->willReturn($fakeApiResponse);

        // Act
        $response = $this->post(route('remove-background'), [
            'requiredFunction' => 'removebg',
            'image' => $fakeImage,
        ]);

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('result');
        $response->assertViewHas('result', $fakeApiResponse);
    }
}
