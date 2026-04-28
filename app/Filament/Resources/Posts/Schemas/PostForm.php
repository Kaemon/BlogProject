<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Blog Post Category')
                    ->description('Select the category for this blog post.')
                    ->schema([
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('categories')
                                    ->nullable(),
                            ])
                    ])->columns(1),
                Section::make('Blog Post Content')
                    ->description('Enter the details of the blog post here.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Top Image')
                            ->image()
                            ->disk('public')
                            ->directory('posts')
                            ->maxSize(10240)
                            ->nullable(),
                        TextInput::make('title')
                            ->required(),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->required()
                            ->default('draft'),
                        RichEditor::make('description')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('attachments')
                            ->columnSpanFull(),
                    ])->columns(3),

            ])->columns(1);
    }
}
