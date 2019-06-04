<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        //dispatch info
                $table->boolean("wet");
                $table->integer("weight");
                $table->integer("sacks");
                $table->integer("stitchNo");
                $table->date("packDate");
                $table->string("region");
                $table->string("woreda");
                $table->string("kebele");
                $table->string("washingStation");
            //owner info
                $table->string("ownerName");
                $table->string("ownerPhone");
            //driver info
                $table->string("driverName");
                $table->string("driverPhone");
                $table->string("driverId");
                $table->string("licenceNum");
            //car info
                $table->string("typeOfCar");
                $table->string("plateNum");
                $table->Integer('cardinalNum');
                $table->boolean("dispatchFill")->default(false);

            $table->string("dispatcher");
            $table->integer("dispatcherId");
            $table->string("dispatchFillTime")->nullable();

            $table->string("dispatchEditor")->nullable();
            $table->integer("dispatchEditorId")->nullable();
            $table->string("dispatchEditTime")->nullable();

        //scale info
            $table->boolean("scaleWet")->nullable();
            $table->integer("scaleWeight")->nullable();
            $table->boolean("scaleFill")->nullable()->default(false);

            $table->string("scalor")->nullable();
            $table->integer("scalorId")->nullable();
            $table->string("scaleFillTime")->nullable();

            $table->string("scaleEditor")->nullable();
            $table->integer("scaleEditorId")->nullable();
            $table->string("scaleEditTime")->nullable();

        //sample info
            $table->string("group1")->nullable();
            $table->string("group2")->nullable();
            $table->string("group3")->nullable();
            $table->string("group4")->nullable();
            $table->boolean("sampleFill")->nullable()->default(false);

            $table->string("sampler")->nullable();
            $table->integer("samplerId")->nullable();
            $table->string("sampleFillTime")->nullable();

            $table->string("sampleEditor")->nullable();
            $table->integer("sampleEditorId")->nullable();
            $table->string("sampleEditTime")->nullable();

        //speciality info
            $table->decimal("specialty")->nullable();
            $table->decimal("wetnessPercent")->nullable();
            $table->boolean("specialtyFill")->nullable()->default(false);

            $table->string("tester")->nullable();
            $table->integer("testerId")->nullable();
            $table->string("specialtyFillTime")->nullable();

            $table->string("specialtyEditor")->nullable();
            $table->integer("specialtyEditorId")->nullable();
            $table->string("specialtyEditTime")->nullable();

        //Encoded info
            $table->string("encode")->nullable();

        //Grade info
            $table->string("washedGrade")->nullable();
            $table->string("unwashedGrade")->nullable();
            $table->boolean("gradeFill")->nullable()->default(false);

            $table->string("grader")->nullable();
            $table->integer("graderId")->nullable();
            $table->string("gradeFillTime")->nullable();

            $table->string("gradeEditor")->nullable();
            $table->integer("gradeEditorId")->nullable();
            $table->string("gradeEditTime")->nullable();

        //Jar approval
            $table->boolean("jarApproved")->nullable()->default(false);

 //           $table->string("price")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffees');
    }
}
