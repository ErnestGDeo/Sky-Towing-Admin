<?php

namespace App\Providers;

use App\Models\Profit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Storage;
use Throwable;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->builderMacros();
    }

    public function builderMacros()
    {
        /**
         * where column contains value
         * alias from WHERE LIKE
         *
         * @param string|array $columns
         * @param string $value
         * @return Builder
         * @example $query->contains('column','value')
         * @example $query->contains(['column','column2'],'value')
         * @example $query->contains('relation.column','value')
         */
        Builder::macro('contains', function (string|array $columns, string $value): Builder {
            /** @var Builder $this */
            $this->where(function (Builder $query) use ($columns, $value) {
                foreach (Arr::wrap($columns) as $column) {
                    $query->when(
                        str_contains($column, '.'),

                        // Relational searches
                        function (Builder $query) use ($column, $value) {
                            $parts = explode('.', $column);
                            $relationColumn = array_pop($parts);
                            $relationName = join('.', $parts);

                            return $query->orWhereHas(
                                $relationName,
                                function (Builder $query) use ($relationColumn, $value) {
                                    $query->where($relationColumn, 'LIKE', "%{$value}%");
                                }
                            );
                        },

                        // Default searches
                        function (Builder $query) use ($column, $value) {
                            return $query->orWhere($column, 'LIKE', "%{$value}%");
                        }
                    );
                }
            });

            return $this;
        });

    }
}
