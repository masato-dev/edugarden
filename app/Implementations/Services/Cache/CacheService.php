<?php
namespace App\Implementations\Services\Cache;

use Cache;
use DateInterval;
class CacheService {
    /**
     * Retrieve an item from the cache by key.
     *
     * @param string $key The cache key.
     * @param array|null $tags Optional tags to scope the cache retrieval.
     * @return mixed The cached value associated with the given key, or null if not found.
     */

    public function get(string $key, array | null $tags = null): mixed {
        return $tags ? Cache::tags($tags)->get($key) : Cache::get($key);
    }

    /**
     * Store an item in the cache.
     *
     * @param string $key The cache key.
     * @param mixed $value The value to store in the cache.
     * @param DateInterval|int|null $ttl The time to live for the cache record. If null, the default TTL will be used.
     * @param array|null $tags Optional tags to scope the cache storage.
     * @return bool True if the cache record was stored successfully, false otherwise.
     */
    public function set(string $key, mixed $value, DateInterval | int | null $ttl = null, array | null $tags = null): bool {
        return $tags ? Cache::tags($tags)->put($key, $value, $ttl) : Cache::set($key, $value, $ttl);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param string $key The cache key.
     * @param mixed $value The value to store in the cache.
     * @param array|null $tags Optional tags to scope the cache storage.
     * @return bool True if the cache record was stored successfully, false otherwise.
     */
    public function forever(string $key, mixed $value, array | null $tags = null): bool {
        return $tags ? Cache::tags($tags)->put($key, $value) : Cache::forever($key, $value);
    }

    /**
     * Remove an item from the cache.
     *
     * @param string $key The cache key.
     * @param array|null $tags Optional tags to scope the cache deletion.
     * @return bool True if the cache record was deleted successfully, false otherwise.
     */
    public function delete(string $key, array | null $tags = null): bool {
        return $tags ? Cache::tags($tags)->delete($key) : Cache::delete($key);
    }

    /**
     * Delete all cache records for a given model.
     *
     * @param string $model The model name.
     * @param array|null $tags Optional tags to scope the cache deletion.
     * @return void
     */
    public function deleteCacheList(string $model, array | null $tags = null): void
    {
        $cache = $tags ? Cache::tags($tags) : Cache::class;
        if ($cache instanceof \Illuminate\Cache\TaggedCache) {
            $keys = $cache->getRedis()->keys("*:$model:*");
            foreach ($keys as $key) {
                $realKey = str_replace(config('const.cache.prefix'), '', $key);
                $realKey = preg_replace('/^[^:]+:/', '', $realKey);
                $realKeyArr = explode(':', $realKey);
                $deleteCache = true;
                if(count($realKeyArr) > 1 && is_numeric($realKeyArr[1]))
                    $deleteCache = false;
                if($deleteCache)
                    $cache->delete($realKey);
            }
        }
    }

    /**
     * Delete all cache records where the key matches the given pattern.
     *
     * @param string $pattern The pattern to match against. Supports * and ? wildcards.
     * @param array|null $tags Optional tags to scope the cache deletion.
     * @return int The number of cache records deleted.
     */
    public function deleteBy(string $pattern, array | null $tags = null): int {
        $cache = $tags ? Cache::tags($tags) : Cache::class;
        $deletedCount = 0;

        if ($cache instanceof \Illuminate\Cache\TaggedCache) {
            $keys = $cache->getRedis()->keys("{$pattern}:*");
            
            foreach ($keys as $key) {
                if ($cache->forget($key)) {
                    $deletedCount++;
                }
            }
        }
        return $deletedCount;
    }
}