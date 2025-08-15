<?php
namespace App\Interfaces\Sections;


interface SectionRepositoryInterface
{

    // get All Sections
    public function index();
    // Create New Sections
    public function create();
    // store Sections
    public function store($request);

    // Update Sections
    public function update($request);

    // destroy Sections
    public function destroy($request);

    // destroy Sections
    public function show($id);

}
