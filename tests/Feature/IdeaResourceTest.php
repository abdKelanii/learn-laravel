<?php

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows the ideas index', function () {
    $this->get(route('ideas.index'))->assertSuccessful();
});

it('lists ideas on the index', function () {
    $ideas = Idea::factory()->count(2)->create();

    $response = $this->get(route('ideas.index'));

    $response->assertSuccessful();
    $response->assertSee($ideas->first()->title, escape: false);
});

it('shows the create form', function () {
    $this->get(route('ideas.create'))->assertSuccessful();
});

it('stores a new idea', function () {
    $payload = [
        'title' => 'My great idea',
        'body' => 'This is the full description of the idea.',
    ];

    $response = $this->post(route('ideas.store'), $payload);

    $response->assertRedirect();
    $this->assertDatabaseHas('ideas', [
        'title' => 'My great idea',
        'body' => 'This is the full description of the idea.',
    ]);
});

it('validates store requests', function () {
    $this->post(route('ideas.store'), [
        'title' => '',
        'body' => 'ab',
    ])->assertSessionHasErrors(['title', 'body']);
});

it('shows a single idea', function () {
    $idea = Idea::factory()->create();

    $this->get(route('ideas.show', $idea))
        ->assertSuccessful()
        ->assertSee($idea->title, escape: false)
        ->assertSee($idea->body, escape: false);
});

it('shows the edit form', function () {
    $idea = Idea::factory()->create();

    $this->get(route('ideas.edit', $idea))->assertSuccessful();
});

it('updates an idea', function () {
    $idea = Idea::factory()->create([
        'title' => 'Old',
        'body' => 'Old body content here.',
    ]);

    $response = $this->put(route('ideas.update', $idea), [
        'title' => 'New title',
        'body' => 'New body content that is long enough.',
    ]);

    $response->assertRedirect(route('ideas.show', $idea));
    expect($idea->fresh())
        ->title->toBe('New title')
        ->body->toBe('New body content that is long enough.');
});

it('deletes an idea', function () {
    $idea = Idea::factory()->create();

    $response = $this->delete(route('ideas.destroy', $idea));

    $response->assertRedirect(route('ideas.index'));
    $this->assertDatabaseMissing('ideas', ['id' => $idea->id]);
});

it('returns not found for unknown idea id', function () {
    $this->get(route('ideas.show', ['idea' => 999999]))->assertNotFound();
});
