public function show(int $id)
{
    $estadis = Session::get('estadis', $this->estadis);
    abort_if(!isset($estadis[$id]), 404);
    $estadi = $estadis[$id];
    return view('estadis.show', compact('estadi'));
}