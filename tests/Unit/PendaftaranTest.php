<?php

namespace Tests\Unit;

use App\Models\Pendaftaran;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

class PendaftaranTest extends TestCase
{
    protected function tearDown(): void
    {
        Carbon::setTestNow();

        parent::tearDown();
    }

    public function test_current_tahun_ajaran_uses_july_as_start_month(): void
    {
        Carbon::setTestNow('2026-06-30 10:00:00');
        $this->assertSame('2025/2026', Pendaftaran::currentTahunAjaran());

        Carbon::setTestNow('2026-07-01 10:00:00');
        $this->assertSame('2026/2027', Pendaftaran::currentTahunAjaran());
    }
}
