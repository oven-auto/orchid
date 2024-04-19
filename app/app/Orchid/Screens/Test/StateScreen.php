<?php

namespace App\Orchid\Screens\Test;

use Orchid\Screen\Fields\Label;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;
use Illuminate\Http\Request;

class StateScreen extends Screen
{
    public $clicks;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'clicks' => $this->clicks ?? 0,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'StateScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('+1')
                ->icon('pencil')
                ->method('increment'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Label::make('clicks')
                    ->title('Click Count'),
                Button::make('Increment Click')
                    ->type(Color::DARK)
                    ->method('increment'),
            ]),
        ];
    }

    public function increment(Request $request)
    {
        $this->clicks++;
    }
}
