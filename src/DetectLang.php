<?php 

namespace DetectLang;


class DetectLang
{
	private $languages;
	private $scores;
	private $text;
	
	private function init()
	{
		$this->scores = [];

		// Convert the input text to lower case when possible
		$this->text = strtolower($this->text);

		// Remove punctuation marks
		$this->text = preg_replace('#[[:punct:]]#', '', $this->text);

		// Convert the text in to an array
		$this->text = explode(' ', $this->text);

		// Languages and word list
		$this->languages = [
			'en' => ['a', 'an', 'and', 'as', 'are', 'at', 'be', 'do', 'for', 'have', 'he', 'i', 'in', 'is', 'it', 'not', 'of', 'on', 'that', 'the', 'to', 'you', 'was', 'we', 'with'],

			// Add aditional languages and their words as much as possible
		];

		// Iterate through the input text
		foreach ($this->text as $input_word) {
			
			// Iterate through the language lists
			foreach ($this->languages as $language => $lang_words) {

				// Iterate through the language words to find matching words
				foreach ($lang_words as $lang_word) {

					if ($lang_word == $input_word) {

						if (isset($this->scores[$language])) {
							$this->scores[$language]++;
						} else {
							$this->scores[$language] = 1;
						}
					}
				}
			}
		}

		ksort($this->scores);
	}

	private function get_total_words_count()
	{
		$total_words = 0;

		foreach ($this->scores as $language => $word_counts) {
			$total_words = $total_words + $word_counts;
		}

		return $total_words;
	}

	public function set_text($input_text)
	{
		$this->text = $input_text;

		$this->init();
	}

	public function get_language()
	{
		$total_words = $this->get_total_words_count();

		return [ key($this->scores) => reset($this->scores) / $total_words ];
	}

	public function get_scores()
	{
		$total_words = $this->get_total_words_count();

		foreach ($this->scores as $language => $word_counts) {
			$this->scores[$language] = $word_counts / $total_words;
		}

		return $total_words == 0 ? 0 : $this->scores;
	}
}
 ?>