<?php
namespace Application\Database\Migration;

interface Migrable
{
    public function up();

    public function down();
}