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
            $table->integer("cardinal")->unique();
            $table->boolean("cardinalProcessed")->default(false);

            $table->bigIncrements('id')->unique();
            $table->timestamps();
        //dispatch info
                $table->boolean("wet")->nullable();
                $table->integer("weight")->nullable();
                $table->integer("sacks")->nullable();
                $table->integer("stitchNo")->nullable();
                $table->date("packDate")->nullable();
                $table->string("region")->nullable();
                $table->string("woreda")->nullable();
                $table->string("kebele")->nullable();
                $table->string("washingStation")->nullable();
            //owner info
                $table->string("ownerName")->nullable();
                $table->string("ownerPhone")->nullable();
            //Representative Info
                $table->string("representativeName")->nullable();
                $table->string("representativeMail")->nullable();
            //driver info
                $table->string("driverName")->nullable();
                $table->string("driverPhone")->nullable();
                $table->string("driverId")->nullable();
                $table->string("licenceNum")->nullable();
            //car info
                $table->string("typeOfCar")->nullable();
                $table->string("plateNum")->nullable();
                $table->boolean("dispatchFill")->nullable();

            $table->string("dispatcher")->nullable();
            $table->integer("dispatcherId")->nullable();
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
            $table->integer("specialty")->nullable();
            $table->integer("wetnessPercent")->nullable();
            $table->boolean("specialtyFill")->nullable()->default(false);

            $table->string("tester")->nullable();
            $table->integer("testerId")->nullable();
            $table->string("specialtyFillTime")->nullable();

            $table->string("specialtyEditor")->nullable();
            $table->integer("specialtyEditorId")->nullable();
            $table->string("specialtyEditTime")->nullable();

        //Encoded info
            $table->string("encode")->nullable()->unique();

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
            $table->string("manager")->nullable();
            $table->integer("managerId")->nullable();
            $table->string("jarApprovalTime")->nullable();

        //Price Input
            $table->boolean("priceDone")->nullable()->default(false);
            $table->integer("price")->nullable();

            $table->string("representative")->nullable();
            $table->integer("representativeId")->nullable();
            $table->string("priceInputTime")->nullable();

            $table->string("priceEditTime")->nullable();

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
